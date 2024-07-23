
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

export default interface Book {
    id: any;
    title: string;
    author: string;
    published_date: string;
    price?: number;
    cover: string;
    file: string;
    category_id: any
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
}

export default interface Submit {
    user_id: string;
    classroom_id;
    assignment_id?: number;
    work?: string;
}