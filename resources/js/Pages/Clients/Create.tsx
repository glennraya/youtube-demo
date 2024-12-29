import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { PageProps } from '@/types'
import { Head } from '@inertiajs/react'

const Create = ({ auth, users }: PageProps) => {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="text-2xl font-black">Add Clients</h2>}
        >
            <Head title="Client Management" />
        </AuthenticatedLayout>
    )
}

export default Create
