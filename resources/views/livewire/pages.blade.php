<main class="body-content">
<div class="container-fluid py-4">
    <form wire:submit.prevent="save"  enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-6 col-sm-6 d-flex justify-content-start align-items-center" >
                            <h5 class="mb-0">{{ translate('Site Pages') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div wire:ignore class="form-group">
                                <label for="ads1_file" class="form-control-label">{{ translate('Aboutus Page') }}</label>
                                <div class="" style="min-height:400px;">
                                    <textarea wire:model='aboutus' class="form-control" 
                                        id="aboutus" name="aboutus"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div wire:ignore class="form-group">
                                <label for="ads1_file" class="form-control-label">{{ translate('How to use Page') }}</label>
                                <div class="" style="min-height:400px;">
                                    <textarea wire:model='qna' class="form-control" 
                                        id="qna" name="qna"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden" style="display:none;">
                        <div class="col-md-12">
                            <div wire:ignore class="form-group">
                                <label for="ads1_file" class="form-control-label">{{ translate('Tutorial Page') }}</label>
                                <div class="" style="min-height:400px;">
                                    <textarea wire:model='tutorial'  class="form-control" 
                                        id="tutorial"
                                        name="tutorial"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div wire:ignore class="form-group">
                                <label for="privacy" class="form-control-label">{{ translate('Privacy Page') }}</label>
                                <div class="" style="min-height:400px;">
                                    <textarea wire:model='privacy'  class="form-control" 
                                        id="privacy"
                                        name="privacy"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type='hidden' id='h1' name='h1' />
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center py-3">
                            <button class="btn btn-primary btn-sm mb-1" type="submit">{{translate('Save')}}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
        
    $(document).ready(function () {
        const TopAdv_editor = CKEDITOR.replace('aboutus', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height : 300,
        });
        const LeftAdv_editor = CKEDITOR.replace('qna', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height : 300,
        });
        const RightAdv_editor = CKEDITOR.replace('tutorial', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height : 300,
        });
        TopAdv_editor.on('change', function(event){
                @this.set('aboutus', event.editor.getData());
                
            });
        LeftAdv_editor.on('change', function(event){
                @this.set('qna', event.editor.getData());
            });
        RightAdv_editor.on('change', function(event){
                @this.set('tutorial', event.editor.getData());
            });

        const Privacy_editor = CKEDITOR.replace('privacy', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height : 300,});
        Privacy_editor.on('change', function(event){
                @this.set('privacy', event.editor.getData());
        });
    });
</script>
</main>
