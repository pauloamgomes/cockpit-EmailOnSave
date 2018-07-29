<div>
    <ul class="uk-breadcrumb">
        <li class="uk-active"><span>@lang('EmailOnSave Settings')</span></li>
    </ul>
</div>

@if (empty($collections))
<div class="uk-text-large uk-text-center uk-margin-large-top uk-text-muted">
    <p>@lang('No collections found')</p>
</div>
@endif

<div class="uk-margin-top uk-invisible" if="{collections}" data-uk-grid-margin riot-view>

    <form id="account-form" class="uk-form uk-grid" onsubmit="{ submit }">

        <div class="uk-width-medium-1-2">
            <h3>Email settings</h3>

            <div class="uk-grid-margin">

                <div class="uk-form-row">
                    <label class="uk-text-small">@lang('To')</label>
                    <input class="uk-width-1-1 uk-form-large" type="text" bind="settings.email.to" autocomplete="off" required>
                </div>

                <div class="uk-form-row">
                    <label class="uk-text-small">@lang('Subject')</label>
                    <input class="uk-width-1-1 uk-form-large" type="text" bind="settings.email.subject" autocomplete="off" required>
                </div>

                <div class="uk-form-row">
                    <label class="uk-text-small">@lang('Body')</label>
                    <textarea class="uk-width-1-1 uk-form-large" name="Body" bind="settings.email.body" rows="14"></textarea>
                    <div class="uk-alert">@lang('Use token [:data] in the body to replace with collection values.')</div>
                </div>

            </div>

        </div>

        <div class="uk-width-small-1-4">
            <h3>Collections</h3>
            <div ref="container" class="uk-form-row" each="{collection, index in collections}" onclick="{ setCollection }" style="cursor:pointer;">
                <div class="uk-form-switch">
                    <input ref="check" type="checkbox" id="{ collection['name'] }" checked="{ settings.collections.includes(collection['name']) }"/>
                    <label for="{ collection['name'] }"></label>
                </div>
                <span>{ collection['label'] }</span>
            </div>
        </div>

        <div class="uk-width-medium-1-2">
            <button class="uk-button uk-button-large uk-width-1-3 uk-button-primary uk-margin-right">@lang('Save')</button>
            <a href="@route('/settings')">@lang('Cancel')</a>
        </div>

    </form>


    <script type="view/script">

        var $this = this, $root = App.$(this.root);

        this.mixin(RiotBindMixin);

        this.collections   = {{ json_encode($collections) }};
        this.settings = {{ json_encode($settings) }};

        this.on('mount', function(){

            this.root.classList.remove('uk-invisible');

            // bind clobal command + save
            Mousetrap.bindGlobal(['command+s', 'ctrl+s'], function(e) {

                e.preventDefault();
                $this.submit();
                return false;
            });


            $this.update();
        });

        submit(e) {
            if(e) e.preventDefault();
            const settings = {
                "collections": this.settings.collections,
                "email": Object.assign({}, this.settings.email)
            }
            console.log(settings);

            App.request("/emailonsave/save", {"settings": settings}).then(function(data) {
                console.log(data);
                App.ui.notify("Email on Save settings saved", "success");
            });

            return false;

        }

        setCollection(e) {
            e.preventDefault();
            const name = e.item.collection.name;
            if ($this.settings.collections.includes(name)) {
                const index = $this.settings.collections.indexOf(name);
                if (index !== -1) {
                    $this.settings.collections.splice(index, 1);
                }
            } else {
                $this.settings.collections.push(name);
            }
        }

    </script>

</div>


