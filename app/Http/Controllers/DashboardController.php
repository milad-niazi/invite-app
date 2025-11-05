<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CeremonyRepository;
use App\Repositories\InvitationRepository;

class DashboardController extends Controller
{
    protected $invitationRepository;
    protected $ceremonyRepository;
    public function __construct(InvitationRepository $invitationRepository, CeremonyRepository $ceremonyRepository)
    {
        $this->invitationRepository = $invitationRepository;
        $this->ceremonyRepository = $ceremonyRepository;
    }
    public function index()
    {
        $invitations = $this->invitationRepository->allForUser(auth()->id());
        $ceremonies = $this->ceremonyRepository->all();

        return view('dashboard', compact('invitations', 'ceremonies'));
    }
}
