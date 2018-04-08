<section>
    <div class="tab-content mt-5">
        <div class="m-margin-top-110px">
            <div class="container">
                <div class="m-margin-top-bottom-30px">
                    <p class="h2">Góp ý, lời nhắn hoặc muốn đăng ảnh</p>
                    <p class="text-info">Các bạn đăng muốn đăng ảnh thì để lại link ví dụ (Google driver, facebook, instagram...). <i class="text-warning">Chúng tôi sẽ ghi nguồn bài viết</i></p>
                    <form>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="content">Nội dung: <small class="text-danger">Tối đa 600 ký tự.</small></label>
                            <textarea class="form-control" rows="7" id="content" name="content_" maxlength="600" placeholder="Viết tại đây..." required></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" id="send_mes">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end contents-->