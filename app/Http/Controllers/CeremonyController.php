<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Facades\CeremonyManager;
use App\Factories\CeremonyFactory;

class CeremonyController extends Controller
{
    public function index()
    {
        return view('ceremonies.index');
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

        return redirect()->route('ceremony.create')->with('success', 'مراسم با موفقیت ایجاد شد!');
    }
    public function show(string $linkAddress)
    {
        $invitation = InvitationManager::findByLink($linkAddress);
        if (!$invitation) {
            abort(404, 'Invitation not found');
        }

        return view('invitation.show', ['invitation' => $invitation]);
    }
}
