<?php
namespace App\Http\Controllers;

use App\Interfaces\AdRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdController extends Controller
{
    /**
     * @var AdRepositoryInterface
     */
    private AdRepositoryInterface $adRepository;

    /**
     * @param AdRepositoryInterface $adRepository
     */
    public function __construct(AdRepositoryInterface $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): Application|Factory|View
    {
        $filters = $request->only(['category', 'date']);
        $ads = $this->adRepository->getAll($filters);
        return view('ads.index', compact('ads', 'filters'));
    }

    /**
     * @return View|Factory|Application
     */
    public function create(): View|Factory|Application
    {
        return view('ads.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $this->adRepository->create($data);

        Cache::tags('ads')->flush();

        return redirect()->route('ads.index')->with('success', 'Оголошення створено!');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): Application|Factory|View
    {
        $ad = $this->adRepository->getById($id);
        if (!$ad) {
            abort(404);
        }
        return view('ads.edit', compact('ad'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $this->adRepository->update($id, $data);

        Cache::tags('ads')->flush();

        return redirect()->route('ads.index')->with('success', 'Оголошення оновлено!');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->adRepository->delete($id);

        Cache::tags('ads')->flush();

        return redirect()->route('ads.index')->with('success', 'Оголошення видалено!');
    }
}
