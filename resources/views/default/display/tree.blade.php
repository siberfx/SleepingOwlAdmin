@yield('before.card')

<div class="card card-default {!! $panel_class !!}">
    <div class="card-heading card-header">
        @if ($creatable)
            <a class="btn btn-primary" href="{{ $createUrl }}">
                <i class="fas fa-plus"></i> {{ $newEntryButtonText }}
            </a>
        @endif
        @yield('card.buttons')
        <div class="pull-right">
            @yield('card.heading.actions')
        </div>

        @yield('card.heading')
    </div>

    <div class="card-body">
      @if($max_depth > 1)
        <menu id="nestable-menu" class="no-gutters p-1">
          <button type="button" data-action="expand-all"
          class="btn btn-primary btn-sm">@lang('sleeping_owl::lang.tree.expand')</button>
          <button type="button" data-action="collapse-all"
          class="btn btn-secondary btn-sm">@lang('sleeping_owl::lang.tree.collapse')</button>
        </menu>
      @endif
      <div class="card-body card mt-3">
        <div class="dd nestable" {!! $attributes !!} data-url="{{ $url }}/reorder">
          <ol class="dd-list">
            @include(AdminTemplate::getViewPath('display.tree_children'), ['children' => $items])
          </ol>
        </div>
      </div>
      @yield('card.footer')
    </div>

</div>
@yield('after.card')
