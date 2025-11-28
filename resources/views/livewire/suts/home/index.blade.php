<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('ui.layouts.app')] class extends Component {
    //
}; ?>

<div>
    <main class="sdtl_container">
        <div class="sdtl_col sdtl_col--dark">
            <button id="btn2" class="sdtl_btn" type="button" aria-pressed="false">
                <svg class="sdtl_btn__icon" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true">
                    <g stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <polyline points="12,1 12,10" />
                        <circle fill="none" cx="12" cy="13" r="9" stroke-dasharray="49.48 7.07" stroke-dashoffset="10.6" />
                    </g>
                </svg>
                <span class="sdtl_btn__sr">Power (Dark)</span>
            </button>
        </div>
    </main>
</div>
