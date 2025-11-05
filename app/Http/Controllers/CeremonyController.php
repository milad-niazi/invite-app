<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Facades\CeremonyManager;
use App\Factories\CeremonyFactory;
use App\Repositories\CeremonyRepository;

class CeremonyController extends Controller
{
    protected $ceremonyRepository;

    public function __construct(CeremonyRepository $ceremonyRepository)
    {
        $this->ceremonyRepository = $ceremonyRepository;
    }
    public function index()
    {
        $ceremonies = $this->ceremonyRepository->all();

        return view('ceremonies.index', compact('ceremonies'));
    }
    public function create()
    {
        return view('ceremonies.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        // استفاده از Factory Method برای ایجاد مراسم
        $ceremony = CeremonyFactory::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . now()->timestamp),
            'date' => $request->date,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // CeremonyManager::create([
        //     'title' => $request->title,
        //     'slug' => Str::slug($request->title.'-'.now()->timestamp),
        //     'date' => $request->date,
        //     'location' => $request->location,
        //     'description' => $request->description,
        //     'status' => $request->status,
        // ]);

        return redirect()->route('ceremony.index')->with('success', 'مراسم با موفقیت ایجاد شد!');
    }
    public function edit(string $linkAddress) {}
    public function update(string $linkAddress) {}
    public function destroy($id)
    {
        $ceremony = $this->ceremonyRepository->findById($id);

        if (!$ceremony) {
            return redirect()->route('ceremony.index')
                ->with('error', 'Ceremony not found.');
        }
        $ceremony->delete();
        return redirect()->route('ceremony.index')
            ->with('success', 'Ceremony deleted successfully.');
    }
}
