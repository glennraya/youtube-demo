import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import { PageProps } from '@/types'
import { Input } from '@/Components/ui/input'
import { Label } from '@/Components/ui/label'
import { Head } from '@inertiajs/react'
import { Button } from '@/Components/ui/button'
import { FormEvent, useState } from 'react'
import axios from 'axios'

const Create = ({ auth, users }: PageProps) => {
    const [name, setName] = useState('')
    const [email, setEmail] = useState('')
    const [phone, setPhone] = useState('')

    const handleSubmit = (event: FormEvent) => {
        event.preventDefault()

        axios
            .post('/clients', {
                name,
                email,
                phone
            })
            .then(response => {
                setName('')
                setEmail('')
                setPhone('')
            })
            .catch(error => {})
    }

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="text-2xl font-black">Add Clients</h2>}
        >
            <Head title="Client Management" />

            <div className="flex flex-col gap-4 overflow-y-scroll scroll-smooth py-4">
                <div className="grid w-3/4 gap-4 px-8 xl:grid-cols-2">
                    <form
                        className="flex flex-col gap-2 rounded-xl border border-gray-200 p-6 shadow-sm dark:border-gray-800 dark:bg-black"
                        onSubmit={handleSubmit}
                    >
                        <div className="mb-4">
                            <Label
                                htmlFor="name"
                                className="block text-sm font-medium text-gray-700 dark:text-white"
                            >
                                Name
                            </Label>
                            <Input
                                id="name"
                                placeholder="Enter your name"
                                value={name}
                                onChange={e => setName(e.target.value)}
                                className="dark:bg-gray-900"
                            />
                        </div>

                        <div className="mb-4">
                            <Label
                                htmlFor="email"
                                className="block text-sm font-medium text-gray-700 dark:text-white"
                            >
                                Email
                            </Label>
                            <Input
                                id="email"
                                type="email"
                                placeholder="Enter your email address"
                                value={email}
                                onChange={e => setEmail(e.target.value)}
                                className="dark:bg-gray-900"
                            />
                        </div>

                        <div className="mb-4">
                            <Label
                                htmlFor="phone"
                                className="block text-sm font-medium text-gray-700 dark:text-white"
                            >
                                Phone number
                            </Label>
                            <Input
                                id="phone"
                                type="number"
                                placeholder="Enter your phone number"
                                value={phone}
                                onChange={e => setPhone(e.target.value)}
                                className="dark:bg-gray-900"
                            />
                        </div>

                        <div className="mb-4 flex justify-end">
                            <Button className="dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
                                Submit
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Create
