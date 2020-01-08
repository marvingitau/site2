<?php

namespace App\Policies;

use App\User;
use App\Projects;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectsPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the projects.
     *
     * @param  \App\User  $user
     * @param  \App\Projects  $projects
     * @return mixed
     */
    public function view(User $user, Projects $projects)
    {
       
        return $projects->user_id == $user->id; 
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the projects.
     *
     * @param  \App\User  $user
     * @param  \App\Projects  $projects
     * @return mixed
     */
    public function update(User $user, Projects $projects)
    {
        //
    }

    /**
     * Determine whether the user can delete the projects.
     *
     * @param  \App\User  $user
     * @param  \App\Projects  $projects
     * @return mixed
     */
    public function delete(User $user, Projects $projects)
    {
        //
    }

    /**
     * Determine whether the user can restore the projects.
     *
     * @param  \App\User  $user
     * @param  \App\Projects  $projects
     * @return mixed
     */
    public function restore(User $user, Projects $projects)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the projects.
     *
     * @param  \App\User  $user
     * @param  \App\Projects  $projects
     * @return mixed
     */
    public function forceDelete(User $user, Projects $projects)
    {
        //
    }
}
