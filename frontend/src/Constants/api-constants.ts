export default interface User {
    data: {
        id: any;
        firstName: string;
        lastName: string;
        email: string;
        password?: string;
        phone?: string;
        profile?: string
    };
    permissions: string[]
    roles: string[]
    isAuthenticated: boolean
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