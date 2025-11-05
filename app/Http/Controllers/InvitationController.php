<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ceremony;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Facades\InvitationManager;
use App\Factories\InvitationFactory;
use App\Repositories\InvitationRepository;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    protected $invitationRepository;

    public function __construct(InvitationRepository $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository;
    }
    public function index()
    {
        $invitations = $this->invitationRepository->allForUser(auth()->id());
        return view('invitations.index', compact('invitations'));
    }
    public function create()
    {
        $ceremonies = Ceremony::all();
        return view('invitations.create', compact('ceremonies'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ceremony_id' => 'required|integer',
            'status' => 'integer',
        ]);
        $invitation = InvitationFactory::create([
            'user_id' => Auth::user()->id,
            'ceremony_id' => $request->ceremony_id,
            'link_address' => Str::uuid(),
            'status' => 1,
        ]);
        return redirect()->route('invitation.index')->with('success', 'لینک دعوت با موفقیت ایجاد شد!');
    }
    public function show(string $linkAddress)
    {
        $invitation = InvitationManager::findByLink($linkAddress);
        if (!$invitation) {
            abort(404, 'Invitation not found');
        }
        return view('invitations.show', ['invitation' => $invitation]);
    }

    public function destroy($id)
    {
        $invitation = $this->invitationRepository->findById($id);

        if (!$invitation) {
            return redirect()->route('invitation.index')
                ->with('error', 'Invitation not found.');
        }
        if ($invitation->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $invitation->delete();
        return redirect()->route('invitation.index')
            ->with('success', 'Invitation deleted successfully.');
    }
}
