<div class="card">
    <div class="card-header pb-0 px-3">
        <h6 class="mb-0">Translated Course</h6>
    </div>
    <div class="card-body pt-4 p-3">
        <ul class="list-group">
            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                <div class="d-flex flex-column w-100">
                    <div class="d-flex mb-3 justify-content-between w-100">
                        <span class="text-sm ">Course Title-En</span>
                        <span class="text-sm ">Course Title-Fr</span>
                        <span class="text-sm ">Course Title-Ar</span>
                    </div>

                    <div class="d-flex  align-items-end">
                        <div class="d-flex flex-column">
                            <span class="mb-2 text-xs">Translator Name: <span
                                    class="text-dark font-weight-bold ms-2">Viking Burrito</span></span>
                            <span class="mb-2 text-xs">Email Address: <span
                                    class="text-dark ms-2 font-weight-bold">oliver@burrito.com</span></span>
                            <span class="text-xs">Translated date: <span
                                    class="text-dark ms-2 font-weight-bold">2021-12-12 Thursday 15:35</span></span>
                        </div>

                        <div class="ms-auto">
                            <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                    class="far fa-eye me-2"></i>View</a>
                            <a class="btn btn-link text-dark px-3 mb-0" wire:click.prevent="$emit('showModal', 'SomeData')"><i
                                    class="fas fa-check text-dark me-2" aria-hidden="true"></i>Agree</a>
                        </div>
                    </div>
                </div>
            </li>
            
        </ul>
    </div>
</div>