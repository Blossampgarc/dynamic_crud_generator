<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
class UserSearchController extends Controller
{
    public static function apply(Request $filters)
    {
        $user = (new employee)->newQuery();

        // Search for a user based on their name.
        if ($filters->has('name')) {
            $user->where('name', $filters->input('name'));
        }

        // Search for a user based on their company.
        else ($filters->has('address')) {
            $user->where('address', $filters->input('address'));
        }

        // Search for a user based on their city.
        elseif ($filters->has('department')) {
            $user->where('department', $filters->input('department'));
        }

        // Get the results and return them.
        return $user->get();
    }
}
