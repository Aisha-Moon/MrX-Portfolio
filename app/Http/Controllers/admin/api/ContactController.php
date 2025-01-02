<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    // Method to list all contacts (Read)
    public function index()
    {
        $contacts = Contacts::latest()->get(); 
        return response()->json([
            'success' => true,
            'data' => $contacts,
        ], 200);
    }

    // Method to delete a contact (Delete)
    public function destroy($id)
    {
        $contact = Contacts::find($id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found.',
            ], 404);
        }

        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contact deleted successfully.',
        ], 200);
    }
}
