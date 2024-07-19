
export default interface Profile {
    id: any;
    firstName: string;
    lastName: string;
    email: string;
    password?: string;
    phone?: string;
    profile?: string
}
export default interface User {
    data: Profile;
    permissions: string[]
    roles: string[]
    isAuthenticated: boolean
}

<<<<<<< HEAD
export default interface Book {
    // id: number;
    title: string;
    author: string;
    published_at: string;
    price?: number;
}

export default interface Quiz {
    // id: any;
    classroom_id: any;
    title: string;
    instructions: string;
    points: any;
    deadline: string;
    topics?: string;
    links?: string;
    fields?: string;
}
=======
>>>>>>> 4053aa4cd9ea66bdfa0fe0936b58d402e6ad3d28

export default interface RequestPayment {
    school_name: string;
    school_address: string;
    description: string;
    reference: any[];
}


export default interface Payment {
    method: string;
    amount: number;
    course_id?: number;
    system_id?: number;
<<<<<<< HEAD
}

export default interface Submit {
    user_id: string;
    classroom_id;
    assignment_id?: number;
    work?: string;
=======
>>>>>>> 4053aa4cd9ea66bdfa0fe0936b58d402e6ad3d28
}