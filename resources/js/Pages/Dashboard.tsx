import { Head } from '@inertiajs/react'
import { PageProps } from '@/types'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import MonthlyRevenue from '@/Components/statistics/MonthlyRevenue'
import UserEngagement from '@/Components/statistics/UserEngagement'
import SalesChart from '@/Components/statistics/SalesChart'
import Applicants from '@/Components/statistics/Applicants'
import Subscriptions from '@/Components/statistics/Subscriptions'
import UserData from '@/Components/statistics/UserData'
import Users from '@/Components/statistics/Users'

export default function Dashboard({ auth, users }: PageProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="text-2xl font-black">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="flex flex-col gap-4 overflow-y-scroll scroll-smooth py-4">
                <div className="grid gap-4 px-8 xl:grid-cols-2">
                    <div className="grid w-full grid-flow-row auto-rows-max gap-4 xl:grid-cols-2">
                        <MonthlyRevenue />
                        <UserEngagement />
                        <div className="col-span-2 flex">
                            <SalesChart />
                        </div>
                    </div>

                    <div className="grid w-full grid-flow-row auto-rows-max gap-4 xl:grid-cols-2">
                        <Applicants />
                        <Subscriptions />

                        <div className="col-span-2 flex">
                            <UserData />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}
