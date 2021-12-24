<?php

namespace Kenmush\UjumbeSMS\Http\Controllers;

use Kenmush\UjumbeSMS\Models\Ujumbe;
use function view;

class UjumbeSMSController extends Controller
{
    public function index()
    {
        return view('ujumbesms::index', [
                'totalSms' => Ujumbe::count(),
                'messages' => Ujumbe::paginate(20),
        ]);
    }
}
