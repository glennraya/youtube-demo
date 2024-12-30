import { Button } from '@/Components/ui/button'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { PageProps } from '@/types'
import { Head } from '@inertiajs/react'
import axios from 'axios'

const Index = ({ auth, users }: PageProps) => {
    const handlePayment = (processor: string, amount: number) => {
        axios
            .post('/pay', {
                processor,
                amount
            })
            .then(response => {
                console.log(response)
            })
            .catch(error => {
                console.log(error)
            })
    }

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="text-2xl font-black">Transactions</h2>}
        >
            <Head title="Transactions" />
            <div className="flex flex-col gap-4 overflow-y-scroll scroll-smooth py-4">
                <div className="grid w-3/4 gap-4 px-8 xl:grid-cols-2">
                    <div className="flex flex-col gap-2 rounded-xl border border-gray-200 p-6 shadow-sm dark:border-gray-800 dark:bg-black">
                        <Button onClick={() => handlePayment('stripe', 100.0)}>
                            Pay with Stripe
                        </Button>
                        <Button onClick={() => handlePayment('paddle', 100.0)}>
                            Pay with Paddle
                        </Button>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Index
