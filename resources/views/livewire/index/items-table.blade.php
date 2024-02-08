<div>
    <div>
        <div class="d-flex flex-wrap column-gap-4">
            @foreach ($items as $index => $item)
            <!-- TODO: добавлять синюю рамку карточке товара (класс border-primary), если на товар можно потратить баллы -->
            <livewire:index.item-card wire:key='$index' :itemId="$item->id" :userItems="$userItems" />
            @endforeach
        </div>
    </div>

    <nav aria-label="Page navigation" role="navigation">
        <ul class="pagination my-5 d-flex justify-content-center">
            <li class="page-item">
                <button class="page-link" aria-label="Previous">
                    <span aria-hidden="true">
                        «
                    </span>
                </button>
            </li>

            <li class="page-item">
                <button class="page-link">
                    1
                </button>
            </li>

            <li class="page-item">
                <button class="page-link">
                    2
                </button>
            </li>
            <li class="page-item">
                <button class="page-link">
                    3
                </button>
            </li>
            <li class="page-item">
                <button class="page-link" aria-label="Next">
                    <span aria-hidden="true">
                        »
                    </span>
                </button>
            </li>
        </ul>
    </nav>
</div>
