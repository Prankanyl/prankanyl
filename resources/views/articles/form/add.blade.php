<div class="modal fade" id="ArticleAddModal" tabindex="-1" aria-labelledby="ArticleAddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ArticleAddModalLabel">{{ __('static.btn.add') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('article-add-form') }}" method="get" id="add-article-form">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="ArticleTitle" class="col-sm-2 col-form-label">{{ __('article.title') }} <span class="required-attribute">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="ArticleTitle" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ArticleShortDescription" class="col-sm-2 col-form-label">{{ __('article.short_description') }} <span class="required-attribute">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" id="ArticleShortDescription" style="height: 200px;" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ArticleLongDescription" class="col-sm-2 col-form-label">{{ __('article.long_description') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="long_description" id="ArticleLongDescription" style="height: 300px;"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ArticleImage" class="col-sm-2 col-form-label">{{ __('article.image') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control mt-1" type="file" name="image" id="ArticleImage">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">{{ __('static.btn.save') }}</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="event.preventDefault()">{{ __('static.btn.close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
