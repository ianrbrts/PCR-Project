<?php

namespace Tests\Unit;

use auth;
use Error;
use ErrorException;
use App\Models\task;
use App\Models\User;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\TaskController;
use Symfony\Component\HttpFoundation\Request;

class TaskTest extends TestCase

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Start param is empty !
     */
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    // test for an error on response to asking for tasks created by 
    // a null user
    public function test_unregistered_user_has_no_id(){
        $this->expectException(Error::class);
        task::class->createdByMe(null);
    }

    // test for an error on response to saving a null task
    public function test_cannot_save_empty_task(){
        $this->expectException(Error::class);
        TaskController::class->saveTask(null);
    }

    // test for an error on response to updating a null task
    public function test_cannot_update_empty_task(){
        $this->expectException(Error::class);
        TaskController::class->updateTask(null);
    }

    // test for an error on response to deleting a null task
    public function test_cannot_delete_empty_task(){
        $this->expectException(Error::class);
        TaskController::class->deleteTask(null);
    }

    // test for an error on response for logging in a null string instead of user object
    public function test_cannot_login_null_user(){
        $this->expectException(Error::class);
        LoginController::class->login(null);
    }

    // test for an error on response for logging out a null string instead of user object
    public function test_cannot_logout_null_user(){
        $this->expectException(Error::class);
        LogoutController::class->logout(null);
    }
}
