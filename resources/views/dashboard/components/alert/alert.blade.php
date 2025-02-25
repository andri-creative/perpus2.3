<div class="position-absolute end-0" style="top: 11%;">
    <!-- Success Alert -->
    @if (session('success'))
        <div class="alert alert-success bg-white text-success-600 border-success-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
            role="alert">
            <div class="d-flex align-items-center gap-2">
                <iconify-icon icon="akar-icons:double-check" class="icon text-xl"></iconify-icon>
                {{ session('success') }}
            </div>
            <button class="remove-button text-success-600 text-xxl line-height-1">
                <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
            </button>
        </div>
    @endif

    <!-- Error Alert -->
    @if (session('error'))
        <div class="alert alert-danger bg-white text-danger-600 border-danger-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
            role="alert">
            <div class="d-flex align-items-center gap-2">
                <iconify-icon icon="mingcute:delete-2-line" class="icon text-xl"></iconify-icon>
                {{ session('error') }}
            </div>
            <button class="remove-button text-danger-600 text-xxl line-height-1">
                <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
            </button>
        </div>
    @endif

    <!-- Primary Alert -->
    @if (session('primary'))
        <div class="alert alert-primary bg-white text-primary-600 border-primary-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
            role="alert">
            <div class="d-flex align-items-center gap-2">
                <iconify-icon icon="mingcute:emoji-line" class="icon text-xl"></iconify-icon>
                {{ session('primary') }}
            </div>
            <button class="remove-button text-primary-600 text-xxl line-height-1">
                <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
            </button>
        </div>
    @endif

    <!-- Lilac Alert -->
    @if (session('lilac'))
        <div class="alert alert-lilac bg-white text-lilac-600 border-lilac-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
            role="alert">
            <div class="d-flex align-items-center gap-2">
                <iconify-icon icon="mingcute:emoji-line" class="icon text-xl"></iconify-icon>
                {{ session('lilac') }}
            </div>
            <button class="remove-button text-lilac-600 text-xxl line-height-1">
                <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
            </button>
        </div>
    @endif

    <!-- Warning Alert -->
    @if (session('warning'))
        <div class="alert alert-warning bg-white text-warning-600 border-warning-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
            role="alert">
            <div class="d-flex align-items-center gap-2">
                <iconify-icon icon="mdi:alert-circle-outline" class="icon text-xl"></iconify-icon>
                {{ session('warning') }}
            </div>
            <button class="remove-button text-warning-600 text-xxl line-height-1">
                <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
            </button>
        </div>
    @endif

    <!-- Info Alert -->
    @if (session('info'))
        <div class="alert alert-info bg-white text-info-600 border-info-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between"
            role="alert">
            <div class="d-flex align-items-center gap-2">
                <iconify-icon icon="ci:link" class="icon text-xl"></iconify-icon>
                {{ session('info') }}
            </div>
            <button class="remove-button text-info-600 text-xxl line-height-1">
                <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
            </button>
        </div>
    @endif
</div>
