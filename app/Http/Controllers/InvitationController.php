<?php

namespace App\Http\Controllers;

use App\Models\Ceremony;
use Illuminate\Http\Request;
use App\Facades\InvitationManager;

class InvitationController extends Controller
{
    public function index()
    {
        return view('invitations.index');
    }
    public function create()
    {
        $ceremonies = Ceremony::all();
        return view('invitations.create', compact('ceremonies'));
    }
    public function store(Request $reques) {}
    public function show(string $linkAddress)
    {
        $invitation = InvitationManager::findByLink($linkAddress);
        if (!$invitation) {
            abort(404, 'Invitation not found');
        }

        return view('invitation.show', ['invitation' => $invitation]);
    }
}
