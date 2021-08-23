@props(['title' => ''])
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th"></i> {{ ucwords(str_replace("_", " ", $title)) }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body table-responsive">
        <div class="row">
            {{ $slot }}
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        window.livewire.on('remove-invalid', () => {
            const elementTag = ["input", "select", "textarea"];
            const element = $(".form-group");
            // Remove invalid class
            elementTag.forEach((tag) => {
                element.find(tag).removeClass("is-invalid");
            });
            element.find("span").remove();
        });

        window.livewire.on('hide-modal', () => {
            $('.modal').modal('hide');
        });

        // toast alert
        window.livewire.on('toast', (type, message) => {
            $(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: type,
                    title: message
                })
            });
        });
    </script>
@endpush
