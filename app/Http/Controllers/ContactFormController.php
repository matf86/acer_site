<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function sendContactMessage(Client $guzzle, Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email',
           'phone' => 'numeric',
           'message' => 'required',
           'g-recaptcha-response' => 'required|recaptcha'
        ], [
            'name.required' => 'Podaj swoje imie, nazwisko lub nazwe firmy.',
            'email.required' => 'Podaj swój adres e-mail.',
            'email.email' => 'Podany adres e-mail jest niepoprawny.',
            'phone.numeric' => 'Numer telefonu musi składac sie z cyfr.',
            'message.required' => 'Wprowadź treść wiadomości.',
            'g-recaptcha-response.required' => 'Oznacz pole - Nie jestem robotem.',
            'g-recaptcha-response.recaptcha' => 'Nieudana weryfikacja nadawcy formularza. Odśwież strone i spróbuj ponownie.',
        ]);

        $message = [
          'author' => $request->get('name'),
          'email' => $request->get('email'),
          'phone' => $request->get('phone')?? null,
          'message' => $request->get('message')
        ];

        Mail::to(env('COMPANY_EMAIL'))->send(new ContactFormMail($message));

        return response()->json(['status' => 'success', 'message' => 'Wiadomośc pomyślnie przesłana, dziekujemy.'], 200);
    }
}
