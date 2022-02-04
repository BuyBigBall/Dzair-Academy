<style>
.badge {
     padding: 0.15em 0.40em;
}
.badge.float-right {
     float: right;
}

.chat-message-right
{
    text-align: right;
}

.btn.btn.btn-primary{
    margin-bottom: 0px;
}


.position-relative.chatting-content
{
    overflow-x: hidden;
    overflow-y: auto;
    height: 100vh;
}

</style>
<main class="content">
    <div class="container p-0">
        <!-- <h1 class="h3 mb-3">Messages</h1> -->
        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-lg-5 col-xl-3 border-right">
                    <div class="px-4 d-none d-md-block">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <input type="text" class="form-control my-3" placeholder="Search..."/></div>
                        </div>
                    </div>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <div class="badge bg-success float-right">5</div>
                        <div class="d-flex align-items-center opp-man">
                            <img
                                src="{{ asset('assets/img/avatar5.png') }}"
                                class="rounded-circle mr-1"
                                alt="Vanessa Tucker"
                                width="40"
                                height="40"/>
                            <div class="flex-grow-1 ml-3 ps-1">Vanessa Tucker
                                <!-- <div class="small">
                                    <span class="fas fa-circle chat-online"></span>
                                    Online</div> -->
                            </div>
                        </div>
                    </a>

                    <hr class="d-block d-lg-none mt-1 mb-0"/></div>
                <div class="col-12 col-lg-7 col-xl-9">
                    <div class="py-2 px-4 border-bottom d-none d-lg-block">
                        <div class="d-flex align-items-center py-1">
                            <div class="position-relative">
                                <img
                                    src="{{ asset('assets/img/avatar3.png') }}"
                                    class="rounded-circle mr-1"
                                    alt="Sharon Lessman"
                                    width="40"
                                    height="40"/></div>
                            <div class="flex-grow-1 pl-3">
                                <strong>Sharon Lessman</strong>
                                <div class="text-muted small">
                                    <em>Typing...</em>
                                </div>
                            </div>
                            <div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="position-relative chatting-content">
                        <div class="chat-messages p-4">
                            <div class="chat-message-right pb-4">
                                <div>
                                    <img
                                        src="{{ asset('assets/img/avatar1.png') }}"
                                        class="rounded-circle mr-1"
                                        alt="Chris Wood"
                                        width="40"
                                        height="40"/>
                                    <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                    <div class="font-weight-bold mb-1">You</div>
                                    Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.</div>
                            </div>
                            <div class="chat-message-left pb-4">
                                <div>
                                    <img
                                        src="{{ asset('assets/img/avatar3.png') }}"
                                        class="rounded-circle mr-1"
                                        alt="Sharon Lessman"
                                        width="40"
                                        height="40"/>
                                    <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                </div>
                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                    <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                    Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-0 py-3 px-4 border-top">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type your message"/>
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>