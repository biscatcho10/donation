<?php

namespace Modules\Installer\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Installer\Entities\Utilities\PermissionsChecker;

class PermissionsController extends Controller
{
    /**
     * @var PermissionsChecker
     */
    protected $permissions;

    /**
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker)
    {
        $this->permissions = $checker;
    }

    /**
     * Display the permissions check page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $permissions = $this->permissions->check(
            config('installer.permissions')
        );

        return view('installer::permissions.index', compact('permissions'));
    }
}
