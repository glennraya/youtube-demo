import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { PageProps } from '@/types'

const Clients = ({ auth, users }: PageProps) => {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="text-2xl font-black">Clients</h2>}
        ></AuthenticatedLayout>
    )
}

export default Clients
