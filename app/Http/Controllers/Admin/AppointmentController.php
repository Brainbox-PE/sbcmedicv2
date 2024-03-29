<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\SoftMedic\Patients\Patient;
use App\SoftMedic\Service\Appointments\Appointment;
use App\SoftMedic\Settings\Roles\Rol;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $from = Carbon::parse(request('month'))->startOfMonth()->format('Y-m-d');
        $to = Carbon::parse(request('month'))->endOfMonth()->format('Y-m-d');

        $appointments = Appointment::with('patient','specialty','doctor','payments')
            ->where('fechaCita','>=',$from)
            ->where('fechaCita','<=',$to)
            ->orderBy('fechaCita','desc')
            ->get();

        if(request()->filled('status'))
            $appointments = $appointments->where('status',request('status'));

        return view('service.appointments.index',[
            'appointments' => $appointments,
        ]);
    }

    public function addPayment(Appointment $appointment)
    {
        $appointment->payments()->update(['pago' => 1,'idUsuarioPago' => Auth::id(),'fechaPago'=> now()]);

        return redirect()->route('appointment.index',"status=1&month=".now()->format('Y-m'))->with('message','Pago agregado');
    }

    public function addRemove(Appointment $appointment)
    {
        $appointment->payments()->update(['pago' => 0,'idUsuarioPago' => NULL,'fechaPago'=> NULL]);

        return redirect()->route('appointment.index',"status=1&month=".now()->format('Y-m'))->with('message','Pago removido');
    }
}
