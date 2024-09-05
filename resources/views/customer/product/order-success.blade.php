<x-guest-layout>
    <section
        class="relative z-0 w-full pt-12 pb-12 min-h-fit lg:min-h-screen lg:pb-16 lg:pt-16 isolate bg-background food-pattern">
        <div class="max-w-screen-xl px-6 mx-auto">
            <div class="mx-auto ">
                <div class="max-w-2xl mx-auto">
                    <h2 class="mb-2 text-xl font-semibold text-tertiary sm:text-2xl">Thanks for your
                        order!</h2>
                    <p class="mb-6 text-sm text-tertiary/50 md:mb-8">Your order <a href="#"
                            class="font-medium text-tertiary hover:underline hover:text-primary">#{{ $orders->order_number }}</a>
                        will be
                        processed within 24 hours during working days. We will notify you by email once your order has
                        been shipped.</p>
                    <div
                        class="relative p-6 mb-6 space-y-4 text-sm bg-white border border-gray-100 rounded-lg sm:space-y-2 md:mb-8 md:text-md">
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Date</dt>
                            <dd class="font-medium text-tertiary sm:text-end">{{ $payment->created_at }}</dd>
                        </dl>
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Payment Method</dt>
                            <dd class="font-medium text-tertiary sm:text-end">JPMorgan monthly
                                installments</dd>
                        </dl>
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Purchase Option</dt>
                            <dd class="font-medium uppercase text-tertiary sm:text-end">{{ $orders->purchase_option }}
                            </dd>
                        </dl>
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Name</dt>
                            <dd class="font-medium text-tertiary sm:text-end">{{ $orders->customer_name }}</dd>
                        </dl>
                        <dl class="items-start justify-between w-full gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Address</dt>
                            <dd class="w-full font-medium text-tertiary sm:text-end">{{ $orders->customer_address }},
                                <span class="uppercase">{{ $orders->customer_district }}</span>, <span
                                    class="uppercase">{{ $orders->customer_regency }}</span>, <span
                                    class="uppercase">{{ $orders->customer_province }}</span>, <span
                                    class="uppercase">{{ $orders->customer_country }}</span>, ID <span
                                    class="uppercase">{{ $orders->customer_postcode }}</span>
                            </dd>
                        </dl>
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Phone</dt>
                            <dd class="font-medium text-tertiary sm:text-end">+(62) {{ $orders->customer_phone }}</dd>
                        </dl>
                    </div>
                    <div class="flex flex-col items-center space-x-0 space-y-4 md:space-y-0 md:space-x-4 md:flex-row">
                        <a href="{{ route('product.collections') }}"
                            class="w-full md:w-fit text-center text-white bg-primary hover:bg-red-800 focus:ring-0 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">Return
                            to shopping</a>
                        <a href="{{ route('dashboard') }}"
                            class="w-full md:w-fit py-2.5 px-5 text-center text-sm font-medium text-tertiary focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-0 focus:ring-gray-100">Return
                            home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
