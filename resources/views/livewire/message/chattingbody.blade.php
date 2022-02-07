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
.rounded-circle.mr-1
{
    background-color:#BADFE7;
}

</style>
<main class="content w-100">
    <div class="container p-0">
        <!-- <h1 class="h3 mb-3">Messages</h1> -->
        <div class="card">
            <div class="row g-0">
                <div class="col-12 col-lg-5 col-xl-3 border-right">
                    <div class="px-4 d-none d-md-block">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <input wire:model="search" type="text" class="form-control my-3" placeholder="{{ translate('Search...') }}"/>
                            </div>
                        </div>
                    </div>

                    @foreach($userlist as $user)
                    <a wire:click="SelectChatUser({{ $user->id }})" class="list-group-item list-group-item-action border-0 cursor-pointer">
                        <div class="badge bg-success float-right {{ $user->sent_message->count()==0 ? 'd-none' : '' }}"> {{ $user->sent_message->count() }}</div>
                        <div class="d-flex align-items-center opp-man">
                            <img
                                src="{{ userphoto($user->photo) }}"
                                class="rounded-circle mr-1"
                                alt="{{ $user->name }}"
                                width="40"
                                height="40"/>
                            <div class="flex-grow-1 ml-3 ps-1">{{ $user->name }}
                                <!-- <div class="small"> <span class="fas fa-circle chat-online"></span>
                                Online</div> -->
                            </div>
                        </div>
                    </a>
                    <hr class="d-block d-lg-none mt-1 mb-0"/>
                    @endforeach
                </div>
                <div class="col-12 col-lg-7 col-xl-9">
                    <div class="py-2 px-4 border-bottom d-none d-lg-block">
                        <div class="d-flex align-items-center py-1">
                            <div class="position-relative">
                                <img
                                    src="{{ $seluserphoto }}"
                                    class="rounded-circle mr-1"
                                    alt="{{ $selusername }}"
                                    width="40"
                                    height="40"/></div>
                            <div class="flex-grow-1 pl-3 align-items-center">
                                <strong> &nbsp; {{ $selusername }}</strong>
                                <!-- <div class="text-muted small">
                                    <em>Typing...</em>
                                </div> -->
                            </div>
                            <div></div>
                        </div>
                    </div>
                    <div class="position-relative chatting-content">
                        <div class="chat-messages p-4">
                            <?php $last_from = 0; $last_to = 0; $last_status = 0;
                                $datetime2 = new DateTime( date('Y-n-d H:i:s'));
                             ?>
                            @foreach($chathist as $content)
                            <div class="@if($content->sender->id==Auth::id()) 
                                            chat-message-right
                                        @else
                                            chat-message-left
                                        @endif
                                        h-100">
                                <?php 
                                    
                                    $datetime1 = new DateTime( date('Y-n-d H:i:s', strtotime($content->sent_at) ));
                                    $elapsed = $datetime1->getTimestamp() - $datetime2->getTimestamp();
                                    $datetime2 = $datetime1;
                                ?>
                                @if($last_from!=$content->from || $last_to!=$content->to || $last_status!=$content->status || $elapsed>=120 )
                                <div class="mt-3">
                                    <img
                                        src="{{ userphoto($content->sender->photo) }}"
                                        class="rounded-circle mr-1"
                                        alt="{{ $content->sender->name }}"
                                        width="40"
                                        height="40"/>
                                    <div class="text-muted small text-nowrap mt-2">{{ chattime($content->created_at) }}</div>
                                </div>
                                @endif
                                <div class="flex-shrink-1 bg-light rounded px-3 mr-3" interval="<?php print $elapsed ?>">
                                    @if($last_from!=$content->from || $last_to!=$content->to || $last_status!=$content->status || $elapsed>=120 )
                                    <div class="font-weight-bold mb-1">
                                        @if($content->sender->id==Auth::id())
                                            You
                                        @else
                                            {{ $content->sender->name }}
                                        @endif
                                    </div>
                                    @endif
                                    {{ $content->content }}
                                </div>
                            </div>

                                <?php 
                                    $last_from      = $content->from;
                                    $last_to        = $content->to;
                                    $last_status    = $content->status;
                                ?>
                            @endforeach
                            <!-- <div class="chat-message-left pb-4">
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
                            </div> -->
                        </div>
                    </div>
                    <div class="flex-grow-0 py-3 px-4 border-top">
                        <div class="input-group">
                            <input  type="text" class="form-control" id='message-content' placeholder="{{ translate('Type your message') }}"/>
                            <button onclick="sendMessage(event);" id="sendBtn" class="btn btn-primary">{{ translate('Send') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendMessage(evt)
        {
            event.preventDefault();
            window.livewire.emit('SendChatMessage', $('#message-content').val() );
            $('#message-content').val('');
        }

        $('#message-content').keyup(function(evt){
            var code = evt.key; // recommended to use e.key, it's normalized across devices and languages
            if(code==="Enter") 
            {
                evt.preventDefault();
                sendMessage(evt);
            }
        });

        setInterval( function() {
            window.livewire.emit('RefreshUserList', '');
            //console.log("RefreshUserList function content");
        }, 3000);
        
    </script>
</main>