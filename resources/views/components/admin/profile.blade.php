<x-app-layout>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-cog"></i> {{ Admin::pageName() }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('profile')}}">
                                <div class="row">
                                    <div class="col-6">
                                        @csrf
                                        <div class="form-group">
                                            <x-label for="name" :value="__('Name')"/>
                                            <x-input id="name" class="form-control" type="text" name="name"
                                                     :value="auth()->user()->name" placeholder="name"/>
                                        </div>
                                        <div class="form-group">
                                            <x-label for="username" :value="__('Username')"/>
                                            <x-input id="username" class="form-control" type="text" name="username"
                                                     :value="auth()->user()->username" placeholder="Username"/>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                       <div class="form-group">
                                            <x-label for="email" :value="__('Email')"/>
                                            <x-input id="email" class="form-control" type="email" name="email"
                                                     :value="auth()->user()->email" placeholder="Email"/>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="fas fa-save"></i> Update Profile
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        @if(Session::has('success'))
            <script type="text/javascript">
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('success') }}'
                })
            </script>
        @endif
    @endpush
</x-app-layout>
