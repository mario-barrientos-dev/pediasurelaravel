<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-links modal-header d-none">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 no_pad">
                        <div class="content_video embed-responsive embed-responsive-16by9">
                            <video id="videoModal" class="video-fluid z-depth-1" controls>
                                <source src="{{ asset('videos/video_modal.mp4') }}" />
                            </video>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="terms-check col-md-12">
                        <div class="center_check">
                            <label><input type="checkbox" id="cbTerms" value="first_checkbox">Soy mayor de 13 años</label>
                        </div>
                    </div>
                    <div class="modal-links col-md-6 d-none">
                        <a href="{{ route('register') }}" class="bt_modal">Registro</a>
                    </div>
                    <div class="modal-links col-md-6 d-none">
                        <a href="{{ route('login') }}" class="bt_modal bt_float_right">Iniciar sesión</a>
                    </div>
                    <div class="modal-links col-md-12 d-none">
                        <div class="text-center">
                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" class="bt_modal">Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.1/src/js.cookie.min.js"></script>
<script>
    $(document).ready(function() {
        if (!Cookies.get('terms')) {
            $('#modal-terms').modal({
                keyboard: false,
                backdrop: 'static'
            });
        }

        $('#modal-terms').on('shown.bs.modal', function (e) {
            $('#videoModal').get(0).play();
        })

        $('#modal-terms').on('hide.bs.modal', function (e) {
            $('#videoModal').get(0).pause();
        });

        $("#cbTerms").change(function() {
            if(this.checked) {
                Cookies.set('terms', true);
                $('.terms-check').addClass('d-none');
                $('.modal-links').removeClass('d-none');
            }
        });
    });
</script>
