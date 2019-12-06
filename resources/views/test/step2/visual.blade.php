<div class="ui bottom attached tab segment active" data-tab="first">
  <form class="ui form" id="visual" action="{{action('TestController@visual')}}">
    <div>
      <input type="hidden" name="totalTestTime" :value="totalTestTime">
      <i class="ion-android-time"> Total Test Time: </i><span>@{{totalTestTime | formatSecond}}</span>
    </div>
    <input type="hidden" name="participant_id" value="{{Request::get('participant_id')}}">
    <h4 class="ui dividing header">{{ trans('test.test_variables') }}</h4>
    <div>
      <div class="three fields">
        <div class="field">
          <label>{{ trans('test.test_variable_type') }}</label>
          <select class="ui dropdown" name="test-variable-type" v-model="testVariableType">
            <option value="Alphabet">{{ trans('test.alphabet') }}</option>
            <option value="Numbers">{{ trans('test.numbers') }}</option>
            <option value="Shapes">{{ trans('test.shapes') }}</option>
          </select>
        </div>
        <div class="field">
          <label>{{ trans('test.target_variable') }}</label>
          <select class="ui dropdown" name="target-variable" v-model="targetVariable">
            <option v-for="item in targetVariables" v-text="item"></option>
          </select>
        </div>
        <div class="field">
          <div class="targetPreview" v-text="targetVariable">
          </div>
        </div>
      </div>
      <div class="two fields">
        <div class="field">
          <label>{{ trans('test.dt') }}</label>
          <input type="text" name="dt" placeholder="{{ trans('test.dt') }}" autofocus v-model="dt" />
        </div>
        <div class="field">
          <label>{{ trans('test.isi') }}</label>
          <input type="text" name="isi" placeholder="{{ trans('test.isi') }}" v-model="isi">
        </div>
      </div>
    </div>
    <h4 class="ui dividing header">{{ trans('test.general_test_variables') }}</h4>
    <div class="field">
      <div class="two fields">
        <div class="field">
          <label>{{ trans('test.target_percentage') }}</label>
          <input value="30" type="text" name="test-percentage" placeholder="{{ trans('test.target_percentage') }}">
        </div>
        <div class="field">
          <label>{{ trans('test.number_of_parts') }}</label>
          <input type="text" name="number-of-parts" placeholder="{{ trans('test.number_of_parts') }}" v-model="parts">
        </div>
      </div>
    </div>
    <button class="ui button" type="submit">{{ trans('test.submit') }}</button>
  </form>
</div>
