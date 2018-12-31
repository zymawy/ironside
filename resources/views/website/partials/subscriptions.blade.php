<section class="pricing section">
    <div class="container">
        <div class="pricing-inner section-inner has-top-divider">
            <h2 class="section-title mt-0 text-center">
                الاشتراكات
            </h2>
            <div class="pricing-tables-wrap">
                @foreach($subscriptionPlans as $item)
                    <div class="pricing-table is-revealing">
                        <div class="pricing-table-inner">
                            <div class="pricing-table-main">
                                <div class="pricing-table-header">
                                    <div class="pricing-table-title mt-12 mb-16 text-primary {{ ($item->is_featured? 'bg-primary text-white':'bg-light') }}">
                                        {{ $item->title }}
                                        @if($item->is_featured)
                                            <span class="label-featuered">Best Value</span>
                                        @endif
                                    </div>
                                    <div class="pricing-table-price mb-24 pb-32">
                                        <span class="pricing-table-price-currency h3">$</span>
                                        <span class="pricing-table-price-amount h1">{{ $item->cost }}</span>
                                        @if($item->summary && strlen($item->summary) > 2)
                                            <p style="margin: 5px 0px 0px 0px;">
                                                <i>{{ $item->summary }}</i></p>
                                        @endif
                                    </div>
                                </div>
                                <ul class="pricing-table-features list-reset text-xs mb-56">
                                    @foreach($item->features as $feature)
                                        <li>
                                                    <span class="list-icon">
                                                        <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
                                                                  fill="#00A2B8" fill-rule="nonzero"/>
                                                        </svg>
                                                    </span>
                                            <span>
                                                        {!! $feature->title !!}
                                                    </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="pricing-table-cta">
                                <a class="button button-primary button-block" href="#">
                                    اشترك الان
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>