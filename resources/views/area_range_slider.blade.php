<div class="range_container">
    <div class="sliders_control">
        <input id="fromSlider" type="range" value="{{ $area_bounds->min_area }}" min="{{ $area_bounds->min_area }}"
            max="{{ $area_bounds->max_area }}" />
        <input id="toSlider" type="range" value="{{ $area_bounds->max_area }}" min="{{ $area_bounds->min_area }}"
            max="{{ $area_bounds->max_area }}" />
    </div>
    <div class="form_control">
        <div class="form_control_container">
            <input class="form_control_container__time__input" type="number" id="fromInput"
                value="{{ $area_bounds->min_area }}" min="{{ $area_bounds->min_area }}"
                max="{{ $area_bounds->max_area }}" step="0.1" />
        </div>
        <div class="form_control_container">
            <input class="form_control_container__time__input" type="number" id="toInput"
                value="{{ $area_bounds->max_area }}" min="{{ $area_bounds->min_area }}"
                max="{{ $area_bounds->max_area }}" step="0.1" />
        </div>
    </div>
</div>
