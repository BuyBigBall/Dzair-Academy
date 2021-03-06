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
                            <h5 class="mb-0">{{ translate('Site Settings') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-0">{{ translate('site administrator email') }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="form-control-label">{{ translate('administrator email') }}</label>
                                <div class="">
                                    <input type="email" wire:model="toemail" class="form-control" id="toemail" />
                                    @error('toemail') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-0">{{ translate('mail server manager') }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">{{ translate('mail server username') }}</label>
                                <div class="">
                                    <input type="email" wire:model="email" class="form-control" id="email" />
                                    @error('email') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="form-control-label">{{ translate('password') }} </label>
                                <div class="">
                                    <input type="password" wire:model="password" class="form-control" id="password" />
                                    @error('password') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-0">{{ translate('ads management') }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div wire:ignore class="form-group">
                                <label for="ads1_file" class="form-control-label">{{ translate('top advertisement') }}</label>
                                <div class="">
                                    <textarea wire:model='ads1contents' class="form-control" 
                                        id="top-adv" name="TopAdv"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div wire:ignore class="form-group">
                                <label for="ads1_file" class="form-control-label">{{ translate('left advertisement') }}</label>
                                <div class="" style="min-height:500px;">
                                    <textarea wire:model='ads2contents' class="form-control" 
                                        id="left-adv" name="LeftAdv"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div wire:ignore class="form-group">
                                <label for="ads1_file" class="form-control-label">{{ translate('right advertisement') }}</label>
                                <div class="" style="min-height:500px;">
                                    <textarea wire:model='ads3contents'  class="form-control" 
                                        id="right-adv"
                                        name="RightAdv"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="ads1_file" class="form-control-label">{{ translate('top advertisement') }}</label>
                                <div class="">
                                    <input wire:model="ads1_file" type="file" class="form-control" id="ads1_file" name="ads1_file" />
                                    @error('ads1_file') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ads1_link" class="form-control-label">{{translate('link')}}</label>
                                <div class="">
                                    <input wire:model="ads1_link" type="text" class="form-control" id="ads1_link" name="ads1_link" />
                                    @error('ads1_link') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div> -->
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ads2_file" class="form-control-label">{{ translate('left advertisement') }}</label>
                                <div class="">
                                    <input wire:model="ads2_file" type="file" class="form-control" id="ads2_file" name="ads2_file" />
                                    @error('ads2_file') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ads2_link" class="form-control-label">{{ translate('link') }}</label>
                                <div class="">
                                    <input wire:model="ads2_link" type="text" class="form-control" id="ads2_link" name="ads2_link" />
                                    @error('ads2_link') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ads3_file" class="form-control-label">{{ translate('right advertisement') }}</label>
                                <div class="">
                                    <input wire:model="ads3_file" type="file" class="form-control" id="ads3_file" name="ads3_file" />
                                    @error('ads3_file') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ads3_link" class="form-control-label">{{ translate('link') }}</label>
                                <div class="">
                                    <input wire:model="ads3_link" type="text" class="form-control" id="ads3_link" name="ads3_link" />
                                    @error('ads3_link') <span class="error">{{ translate($message) }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div> -->
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
        // var editor = CKEDITOR.instances['TopAdv'];
        // console.log(editor);
        // if (editor) { editor.destroy(true); }
        
    $(document).ready(function () {
        var config = {
            height : 80,
            width : 1000,
            fullPage : true,
            linkShowAdvancedTab : false,
            scayt_autoStartup : true,
            enterMode : Number(2),
            toolbar : [
                ['Styles','Bold', 'Italic', 'Underline', '-', 
                'NumberedList',
                'BulletedList', 'SpellChecker', '-', 'Undo',
                'Redo', '-', 'SelectAll', 'NumberedList',
                'BulletedList','FontSize' ], [ 'UIColor' ] ]
        };
        
        console.log($('.ckeditor').length);
        //$('#top-adv').ckeditor();
    
        const TopAdv_editor = CKEDITOR.replace('TopAdv', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height : 100,
            width : 1000,
        });
        const LeftAdv_editor = CKEDITOR.replace('LeftAdv', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height : 500,
        });
        const RightAdv_editor = CKEDITOR.replace('RightAdv', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height : 500,
        });
        TopAdv_editor.on('change', function(event){
                @this.set('ads1contents', event.editor.getData());
                
            });
        LeftAdv_editor.on('change', function(event){
                @this.set('ads2contents', event.editor.getData());
            });
        RightAdv_editor.on('change', function(event){
                @this.set('ads3contents', event.editor.getData());
            });
    });
</script>
</main>
