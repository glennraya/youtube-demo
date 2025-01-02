import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle
} from '@/Components/ui/card'
import axios from 'axios'
import { useEffect, useState } from 'react'

const UserData = () => {
    const [userData, setUserData] = useState({
        name: '',
        email: '',
        role: ''
    })

    useEffect(() => {
        axios
            .post('/show-user-data')
            .then(response => {
                setUserData(response.data)
            })
            .catch(error => {})
    }, [])
    return (
        <Card className="h-fit w-full transition duration-300 ease-linear">
            <CardHeader>
                <CardTitle className="flex items-center justify-between text-2xl font-bold">
                    <span>User Data</span>
                </CardTitle>
                <CardDescription>Data from external API</CardDescription>
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

export default UserData
