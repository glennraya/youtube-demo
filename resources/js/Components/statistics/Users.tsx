import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle
} from '@/Components/ui/card'
import axios from 'axios'
import { useEffect, useState } from 'react'

interface User {
    name: string
}

const Users = () => {
    const [userData, setUserData] = useState<User[]>([
        {
            name: ''
        }
    ])

    useEffect(() => {
        axios
            .get('/users')
            .then(response => {
                setUserData(response.data)
            })
            .catch(error => {})
    }, [])
    return (
        <Card className="h-fit w-full transition duration-300 ease-linear">
            <CardHeader>
                <CardTitle className="flex items-center justify-between text-2xl font-bold">
                    <span>Users</span>
                </CardTitle>
                <CardDescription>List of users</CardDescription>
            </CardHeader>
            <CardContent>
                <ul className="">
                    <li className="flex items-center justify-between gap-4">
                        <div className="flex items-center gap-2">
                            <span>Name: </span>
                            <span>{userData.name}</span>
                        </div>
                    </li>
                    <li className="flex items-center justify-between gap-4">
                        <div className="flex items-center gap-2">
                            <span>Email: </span>
                            <span>{userData.email}</span>
                        </div>
                    </li>
                    <li className="flex items-center justify-between gap-4">
                        <div className="flex items-center gap-2">
                            <span>Role: </span>
                            <span>{userData.role}</span>
                        </div>
                    </li>
                </ul>
            </CardContent>
        </Card>
    )
}

export default Users
