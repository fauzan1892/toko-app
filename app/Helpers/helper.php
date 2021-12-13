<?php 
function alertbs_form($errors = 0){
    if(session('success')) {
        echo '<div class="alert alert-success mb-3 alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                '.session('success').'
                </div>';
    }
    if(session('failed')) {
        echo '<div class="alert alert-danger mb-3  alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                '.session('failed').'
                </div>';
    }
    
    if (count($errors) > 0){
        echo '<div class="alert alert-danger mb-3 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>';
                foreach ($errors->all() as $error){
                echo' <li>'.$error.'</li>';
                }
                echo '</ul>
            </div>';
    }
}

function url_images($dir = null, $file = null)
{
    if($dir == null)
    {
        if($file == '')
        {
            return asset('assets/img/news/img01.jpg');
        }else{
            if(file_exists(storage_path('app/public/'.$file)))
            {
                return asset('storage/'.$file);
            }else{
                return asset('assets/img/news/img01.jpg');
            }
        }
    }else{
        if($dir == '' || $file == '')
        {
            return asset('assets/img/news/img01.jpg');
        }else{
            if(file_exists(storage_path('app/public/'.$dir.'/'.$file)))
            {
                return asset('storage/'.$dir.'/'.$file);
            }else{
                return asset('assets/img/news/img01.jpg');
            }
        }
    }
}

function cekimages_unlink($dir = null, $file = null)
{
    if($dir == null)
    {
        if($file == '')
        {
            return '';
        }else{
            if(file_exists(storage_path('app/public/'.$file)))
            {
                return unlink(storage_path('app/public/'.$file));
            }else{
                return '';
            }
        }
    }else{
        if($dir == '' && $file == '')
        {
            return '';
        }else{
            if(file_exists(storage_path('app/public/'.$dir.'/'.$file)))
            {
                return unlink(storage_path('app/public/'.$dir.'/'.$file));
            }else{
                return '';
            }
        }
    }
}
