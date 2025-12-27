<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactDataTable;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContactDataTable $dataTables)
    {
        return $dataTables->render('pages.contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json([
            'status'  => true,
            'data' => [
                'id'      => $contact->id,
                'name'    => $contact->name,
                'email'   => $contact->email,
                'mobile'  => $contact->mobile,
                'message' => $contact->message,
                'created_at' => $contact->created_at->format('d M Y, h:i A'),
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Contact deleted successfully!',
        ]);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function multiDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);

        $ids = explode(',', $request->ids);
        $contacts = Contact::whereIn('id', $ids)->get();

        if ($contacts->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No projects found.'
            ], 404);
        }

        foreach ($contacts as $contact) {
            $contact->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Selected projects deleted successfully!'
        ]);
    }
}
