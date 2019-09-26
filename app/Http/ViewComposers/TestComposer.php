<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;

 class TestComposer
 {
     public $testList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
         $this->testList = [
             'TEST 1',
             'TEST 2',
             'TEST 3',
             'TEST 4',
             'TEST 5',
         ];
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
         $view->with('testcomposer', $this->testList);
     }
 }