<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="app-card app-card-progress-list h-100 shadow-sm">
                 <div class="card-header">Welcome!</div>
                   <div class="app-card-body p-4">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh mail has been sent to your email address.') }}
                        </div>
                    @endif
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>