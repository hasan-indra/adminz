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
                            <form method="POST" action="{{route('password.user')}}">
                                <div class="row">
                                    <div class="col-12">
                                        @csrf
                                        <div class="form-group">
                                            <x-label for="password" :value="__('Password')"/>
                                            <x-input id="password" class="form-control" type="password" name="password"
                                                     placeholder="Password"/>
                                        </div>
                                        <div class="form-group">
                                            <x-label for="password_confirmation" :value="__('Password Confirmation')"/>
                                            <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                                                     placeholder="Password Confirmation"/>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="fas fa-save"></i> Change Password
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
