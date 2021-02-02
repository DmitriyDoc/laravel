@php // @var \App\Models\BlogCategory $item   @endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Основные данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-groupe">
                            <lable for="title">Заголовок</lable>
                            <input type="text" value="{{ $item->title }}"
                                   name="title"
                                   id="title"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-groupe">
                            <lable for="slug">Идентификатор</lable>
                            <input type="text" value="{{ $item->slug }}"
                                   name="slug"
                                   id="slug"
                                   class="form-control">
                        </div>

                        <div class="form-groupe">
                            <lable for="parent_id">Родитель</lable>
                            <select name="parent_id"
                                    id="parent_id"
                                    class="form-control"
                                    placeholder="Выберете категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->parent_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-groupe">
                            <lable for="description">Описание</lable>
                            <textarea name="description"
                                      id="description"
                                      rows="3"
                                      class="form-control">
                                {{ old('description', $item->description) }}
                            </textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
