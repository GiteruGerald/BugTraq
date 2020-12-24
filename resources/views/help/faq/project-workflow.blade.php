@extends('layouts.dashboard')

@section('title','Help')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 3rem;">
                    <div class="card-header">
                        <h4>Project Workflow</h4>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-sm-9">
                                <p>
                                    Creating projects is one of the primary purposes of this system. This process is very simple and can be
                                    completed with just a few clicks.
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="my-3">Step 1: Create Project</h5>
                                        <p class="my-3">The first step is to login to the system, click on the 'Projects' icon and click the 'Create New' button
                                        at the top of the project listing page.
                                        </p>
                                        &nbsp;
                                        <p> Also, on the right side bar of a projects show screen, there is 'Create new project' button that will take user to the create new project page.</p>
                                        <p>
                                            <span class="text-blue">Only the Project Manager is authenticated to do this</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="my-3">Step 2: Assign Testers</h5>
                                        <p class="my-3">
                                            Once the Manager adds a tester to 
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="my-3">Step 3</h5>
                                        <img src="{{ asset('storage/images/screenshots/faq/create-project/set-duration.gif') }}" alt="Set duration" class="img-fluid" width="800">
                                        <p class="my-3">
                                            Once you have added all your modules, you can add the duration of your semster. It is recommended to select a data closest
                                            to the day your examination begins. Afterwards, select the number of hours you could spend self studying per weekday and per weekend day,
                                            and finally, clicking of 'Create Schedule' will create a project for you.
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h5 class="my-3">Step 4</h5>
                                        <img src="{{ asset('storage/images/screenshots/faq/create-project/created-project.png') }}" alt="Created Schedule" class="img-fluid" width="800">
                                        <p class="my-3">
                                            The created project will be available in the 'Schedule' section of the system.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection