<iframe id='contactSend' class="d-flex d-none"></iframe>
<div class="modal fade"
        id="dialogContactus" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top:6rem;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ translate('Contact Us') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="contact" action="{{ route('save-contact') }}" 
                    target="contactSend"
                    method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                            <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                            <fieldset>
                                <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12 py-1">
                            <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 py-1">
                            <fieldset>
                                <button type="submit" class="btn btn-primary">{{ translate('Send Message') }}</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function CloseContactModal(){
        var dialogContactus = new bootstrap.Modal(document.getElementById('dialogContactus'), {  keyboard: false})
        dialogContactus.hide()
    }
</script>