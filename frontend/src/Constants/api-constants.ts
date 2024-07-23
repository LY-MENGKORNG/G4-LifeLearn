
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
<<<<<<< HEAD
    published_at: string;
    price?: any;
=======
    published_date: string;
    price?: number;
    cover: string;
    file: string;
    category_id: any
>>>>>>> 85925ba4f17bb8185dd08a41255b2637f8965d6f
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

export default interface Classroom {
    grade_id?: number;	
    class_name?: string;
    description: string;
    user:{ 
        first_name: string;
        last_name: string;
        phone: string;
        email: string;
        profile: string;
      };
}