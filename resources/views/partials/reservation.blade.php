<section class="section bg-section-black">

    <div class="container">

        <div class="row">
            <div class="col-md-6">

                <div class="section-heading left half xs-text-center xs-margin-30px-bottom">
                    <div class="title-font font-size22 text-theme-color">Бронирование</div>
                    <h4 class="text-white font-weight-bold">Забронировать стол</h4>
                </div>

                <form action="{{route('feedback.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                               placeholder="Как вас зовут?">
                        <small id="name-help" class="form-text text-muted">Нам очень приятно познакомиться</small>
                    </div>

                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control form-control-lg" id="phone" name="phone"
                               aria-describedby="emailHelp" placeholder="Укажите, пожалуйста, номер телефона">
                        <small id="phone-help" class="form-text text-muted">Мы перезвоним в ближайшее время для
                            подтверждения и уточнения деталей
                        </small>
                    </div>

                    <button type="submit" class="btn btn-block btn-lg btn-outline-danger">Забронировать стол</button>
                </form>
            </div>
            <div class="col-md-6 booking-image">
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#phone').mask('+7 (000) 000 0000');

        $("#name").suggestions({
            token: "da38f617d15d828e20e27050a2ceb842d8b79d74",
            type: "NAME",
        });
    });
</script>
